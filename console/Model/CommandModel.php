<?php
namespace console\Model;

interface CommandModel {

    public function command();

    public function messageReturn();

    public function args($args = null);

}