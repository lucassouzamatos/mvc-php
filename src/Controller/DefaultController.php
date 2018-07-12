<?php
namespace src\Controller;

use Controller\Controller;
use Logger\Service\LoggerService;
use src\Services\MessageService;

class DefaultController extends Controller {

    /**
     * (Route=/)
     */
    public function indexAction()
    {
        /** @var MessageService $messageService */
        $messageService = $this->getService("src/Services/MessageService");
        $messageService->setMessage(MessageService::ERROR, 'testando serviço...');

        /** @var LoggerService $loggerService */
        $loggerService = $this->getService("Logger/Service/LoggerService");
        $loggerService->setNameFile('log_test');
        $loggerService->setContent((new \DateTime())->format('d-m-Y H:m:s') . ' -> testing..');

        return $this->renderize('Default/index');
    }
}