<?php

namespace Che\CheLoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\PropertyAccess\Exception\RuntimeException;
use Symfony\Component\Yaml\Yaml;

class CsvToFixturesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('chelore:csv-to-fixtures')
            ->setDescription('Parse csv and create Alice fixtures')
            ->addArgument('file', InputArgument::REQUIRED, 'Csv file with questions and answers')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        if (!file_exists($file)) {
            throw new RuntimeException('File is not exist');
        }

        $csvFile = new \Keboola\Csv\CsvFile($file);
        $questions = array();
        $answers   = array();

        foreach($csvFile as $row) {
            $questionKey = md5($row[0]);
            $questions[$questionKey]['subject'] = $row[0];

            $i = 1;
            while (array_key_exists($i, $row) && $row[$i]) {
                $answer = $row[$i];
                $answerKey = uniqid('answer_');
                $answers[$answerKey]['answer']    = $answer;
                $answers[$answerKey]['isCorrect'] = false;
                $questions[$questionKey]['answers'][] = '@' . $answerKey;

                $i++;
            }
        }

        $pathParts = pathinfo($file);
        $dirName   = $pathParts['dirname'];
        $resultFileName = $dirName . '/result.yml';
        $result = Yaml::dump(array(
            'Che\CheLoreBundle\Document\Answer (local)' => $answers,
            'Che\CheLoreBundle\Document\Question' => $questions,
        ), 4);

        $fileSystem = new Filesystem();
        $fileSystem->dumpFile($resultFileName, $result);

        foreach ($questions as $key => $question) {
            echo "- @" . $key . "\n";
        }

        $output->writeln('<info>Parsing complited!</info>');
    }
}
