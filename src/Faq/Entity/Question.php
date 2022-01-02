<?php
namespace App\Faq\Entity;

use App\Shop\Entity\Hidden;
use function ClientX\d;

class Question
{

    private int $id;
    private string $title = '';
    private string $icon = "fas fa-questions";
    private string $answer = '';
    private bool $hidden = false;
    use Hidden;

    public function getId():?int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = d($answer);
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon = null): void
    {
        if ($icon) {
            $this->icon = $icon;
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title): void
    {
        $this->title = d($title);
    }
}
