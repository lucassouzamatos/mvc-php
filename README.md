# Usage

Acessando o console:
> php console/exec


# Controller
Os controllers são responsáveis por "comandar" o back-end das páginas e são 
armazenados em 'src/Controller'.

Para criar o controller basta utilizar o console:
> php console/exec create:controller Name

As anotações acima das funções são de extrema importância, pois são elas 
quem especificam o caminho da página.
    
    /**
     * (Route=/caminho)
     */
    public function indexAction()
    {
        // seu código aqui
    }

# Serviços
É possível acessar seus serviços a partir de qualquer controller.
Um serviço é uma classe que pode ser chamada de qualquer controller.

Os serviços são registrados em "config/services.json" para serem utilizados:

    {
      "src/Services/MessageService" : {},
    }
    
Caso o seu serviço tenha dependência de outra(s) classe(s), basta fazer 
como no exemplo:

    {
      "Assert/Assert" : {
        "JsonReader" : "FileSystem\\JsonReader"
      }
    }   
    
No seu serviço, basta chamar a dependência via construtor:

    class Assert {
    
        private $jsonReader;
    
        public function __construct(JsonReader $jsonReader) {
            $this->jsonReader = $jsonReader;
        }
    }      

# Views
Para fazer a renderização das views, o controller já possui uma função extendida, 
basta então chamá-la da seguinte forma:
      
      return $this->renderize('Default/index');

Para a renderização as views precisam ser armazenadas na pasta 'src/View',
e não é necessário adicionar a extensão do arquivo, ficando assim a critério do desenvolvedor
optar por algo como "index.php" ou "index".

# Logger
Em DefaultController é possível ver uma demonstração desse serviço
que até então seria usado internamente.
    
É possível criar seus próprios logs da seguinte forma:

        /** @var LoggerService $loggerService */
        $loggerService = $this->getService("Logger/Service/LoggerService");
        $loggerService->setNameFile('log_test');
        $loggerService->setContent((new \DateTime())->format('d-m-Y H:m:s') . ' -> testing..');
        
Por padrãos os logs são salvos na pasta 'logs'.