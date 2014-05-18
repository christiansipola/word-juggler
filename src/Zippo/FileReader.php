<?php
namespace Zippo;

class FileReader
{

    /**
     * 
     * @var array
     */
    private $wordList;
    
    /**
     * 
     * @var int
     */
    private $lengthOfWordlist;
    
    public function __construct()
    {
        $this->wordList = array();
        $fileContent = file(__DIR__.'/../langfiles/Swedish.dic');
        foreach ($fileContent as $w) {
            $word = strstr($w, '/', true);
            if (empty($word)) {
                $word = $w;
            }
            $word = trim($word);
            $this->wordList[] = $word;
        }
        $this->lengthOfWordlist = count($this->wordList);
    }
    
    public function getRandomPassword()
    {
        $passwordLength = 0;
        $password = '';
        while ($passwordLength < 25) {
            $password .= $this->getRandomPassword();
            $passwordLength = mb_strlen($password);
        }
        echo $password;
    }
    
    public function echoListOfRandomWords($numberOfWords = 10)
    {
        $list = array();
        for ($i = 0; $i < $numberOfWords; $i++) {
            $list[] = $this->getRandowWord();
        }
        sort($list);
        echo implode("\n",$list);
    }
    
    public function getRandowWord()
    {
        $randomIndex = rand(0, $this->lengthOfWordlist-1);
        $randomWord = $this->wordList[$randomIndex];
        $randomWord = FileReader::ucfirst($randomWord);
        if (!isset($this->wordList[$randomIndex])) {
            echo "$randomIndex not set";
        } elseif (empty($randomWord)) {
            echo "$randomIndex empty";
        }
        return $randomWord;
    }
    
    public static function ucfirst($word)
    {
        return mb_convert_case($word, MB_CASE_TITLE, 'UTF-8');
    }
}
