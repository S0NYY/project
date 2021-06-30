<?php

require_once('model/languages.php');

/**
 * კლასის აღწერა
 * @გამოყენებული პარამეტრები (properties თვისებები)
 * @შემდეგი პარამეტრი (method შეიძლება იყოს მეთოდი ე.ი. function())
 */

class ViewGenerator extends Languages
{
  public $cxrilis_saxeli; // property თვისება
  public $enis_id; // property თვისება
  private $language_name; // property თვისება

  function __construct($lang_id = 1)
  {
    echo 'კლასი <strong>'  . get_class() . '</strong> ამუშავდა';

    $this->cxrilis_saxeli = $this->table_name; // სათაო კლასის (Languages) protected თვისება მივანიჭეთ მიმდინარე, შვილობილი (ViewGenerator) კლასის public თვისებას, რომ შეგვეძლოს მისი გარედან წაკითხვა
    $this->enis_id = $this->default_lang_id; // სათაო კლასის (Languages) private თვისება მივანიჭეთ მიმდინარე, შვილობილი (ViewGenerator) კლასის თვისებას, მაგრამ მონაცემი არ წამოიღო, ვინაიდან private ჩვენების სახით  წამოდგენილი ცვლადი იკითხება მხოლოდ იმავე კლასსში. სათაო კლასში მოთავსებული თვისება რომ ყოფილიყო protected მაშინ შვილობილ კლასში შევძლებდით მის წაკითხვას
    parent::__construct($lang_id);
  }

  function getArticleTitle($hEl) { // method მეთოდი
    //echo 
    return '<' . $hEl . '>ჩანაწერის სათაური (' . $this->getActiveLaguageName() . ')</' . $hEl . '>';
  }
}

?>