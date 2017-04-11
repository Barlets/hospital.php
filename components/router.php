<?php

	class Router
	{
		private $routes = [];

		public function __construct()
		{
			$routesPath = ROOT . '/config/routes.php';
			$this->routes = include($routesPath);
		}

		//Returns request string
		private function getURI()
		{
			if (!empty($_SERVER["REQUEST_URI"])) {
				return trim($_SERVER["REQUEST_URI"], "/");
			}
		}

		public function run()
		{
			//Получить строку запроса
			$uri = $this->getURI();

			//Проверить наличие такого запроса в routes
			foreach ($this->routes as $uriPattern => $path) {

				//Сравниваем $uriPattern  и $uri
				if (preg_match("~$uriPattern~", $uri)) {

					//получаем внутренний путь из внешнего, согласно правилу
					$internationalRoute = preg_replace("~$uriPattern~", $path, $uri);

					//Определяем, контроллер, action и параметры
					$segments = explode("/", $internationalRoute);
					$controllerName = array_shift($segments) . 'Controller';
					$actionName = "action" . ucfirst(array_shift($segments));

					$parameters = $segments;
//					echo '<pre>';
//					print_r($parameters);
//					echo '</pre>';

					//Подключить файл контроллера
					$controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
					if (file_exists($controllerFile)) {
						include_once($controllerFile);
					}

					//Создать объект и вызвать метод action
					$controllerObject = new $controllerName;
					$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

					if ($result != NULL) {
						break;
					} else echo '404';
				}
			}
		}

	}