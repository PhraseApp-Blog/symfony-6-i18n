<?php

namespace App\Model;

use Symfony\Component\Translation\TranslatableMessage;

class NotificationBanner
{
  /** @var TranslatableMessage */
  public $title;
  /** @var TranslatableMessage */
  public $heading;
  /** @var TranslatableMessage */
  public $content;

  public ?string $translationDomain;
  public array $translationParameters;

  public function __construct($title, $heading, $content, array $translationParameters = [], ?string $translationDomain = "messages")
    {
        $this->title = new TranslatableMessage($title, $translationParameters, $translationDomain);
        $this->heading = new TranslatableMessage($heading, $translationParameters, $translationDomain);
        $this->content = new TranslatableMessage($content, $translationParameters, $translationDomain);
        $this->translationDomain = $translationDomain;
        $this->translationParameters = $translationParameters;
    }
}