<?php

/**
 * კლასის აღწერა
 * @გამოყენებული პარამეტრები (properties თვისებები)
 * @შემდეგი პარამეტრი (method შეიძლება იყოს მეთოდი ე.ი. function())
 */

class Languages
{
  public $zogadi = 'ზოგადი ცვლადი (თვისება)';
  private $languages; // არსებული ენები: ასოცირებული მასივის სახე
  private $default_lang_id = 1; // საწყისი ენის id
  private $active_lang_id; // მიმდინარე ენის id
  private $active_lang_data; // მიმდინარე ენის მონაცემები [სახელი, id]
  protected $table_name = 'laguages';

  function __construct($active_lang_id)
  {
    $this->active_lang_id = $active_lang_id;
    $this->loadLaguages();
    $this->setActiveLaguageData();
  }

  function loadLaguages() { // method მეთოდი
    $this->languages = [1 => 'ქართული', 2 => 'English', 3 => 'Русскй'];
  }

  function setActiveLaguageData() { // method მეთოდი
    $this->active_lang_data = $this->active_lang_id ? 
      [
        'name' => $this->languages[$this->active_lang_id],
        'id' => $this->active_lang_id
      ] :
      [
        'name' => $this->languages[$this->default_lang_id], 
        'id' => $this->default_lang_id
      ];
  }

  function getActiveLaguageName() { // method მეთოდი
    return $this->active_lang_data['name'];
  }

  function getActiveLaguageId() { // method მეთოდი
    return $this->active_lang_data['id'];
  }
}

?>