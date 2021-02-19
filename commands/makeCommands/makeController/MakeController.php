<?php

namespace Commands\makeCommands\makeController;

use Commands\errors\InOutException;
use Commands\TextHandler;
use Commands\UserInputOutput;

class MakeController
{
    public function __construct()
    {
        $this->textHandler = new TextHandler();
        $this->userInputOutput = new UserInputOutput();
        $this->texts = $this->textHandler->getTextsByLang();
    }

    public function run()
    {
        $controllerType = $this->userInputOutput->askUserForInput($this->texts['questions']['CONTROLLER_KIND']);

        switch ($controllerType)
        {
            case 't':
                $makeTwigController = new MakeTwigController();
                break;

            default:
                throw new InOutException($this->texts['errors']['INPUT_ERROR']);
        }
    }
}
