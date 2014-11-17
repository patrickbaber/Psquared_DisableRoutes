<?php

class Psquared_DisableRoutes_Model_Observer
{
	const CONFIG_ENABLED = 'web/disable_routes/disable_routes';
	const CONFIG_ROUTES = 'web/disable_routes/routes';

    public function checkRoute($observer)
    {
		if (Mage::getStoreConfig(self::CONFIG_ENABLED) == '1') {
			$disabledRoutes = Mage::getStoreConfig(self::CONFIG_ROUTES);
			$controllerAction = $observer->getEvent()->getControllerAction();
			$requestString = $controllerAction->getRequest()->getRequestString();
			$actionName = $controllerAction->getRequest()->getActionName();
			if (preg_match($disabledRoutes, $requestString) && $actionName != 'noRoute') {
				$request = Mage::app()->getRequest();
				$request->initForward()
					->setModuleName('cms')
					->setControllerName('index')
					->setActionName('noRoute')
					->setDispatched(false);
			}
		}
    }
}