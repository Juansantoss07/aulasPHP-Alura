<?php

class TocadorDeMusica {

	private $musicas;
	private $historico;
	private $filaDeDownloads;
	private $ranking; 

	public function __construct(){
		/* O objeto SplDoublyLinkedList() serve para criar uma lista ligada, ou seja, cada item vai estar ligado ao outro item da nossa array (da nossa lista). Isso é ótimo para quando queremos navegar entre os itens do array  */
		$this->musicas = new SplDoublyLinkedList();
		$this->musicas->rewind(); // Precisamos deixar a lista ligada sempre na posição inicial, então é de boa prática passar o método rewind() já no construtor da classe também.
		$this->historico = new SplStack(); // Aqui estamos estanciando outro objeto collection, o SplStack() é uma pilha de dados, podemos usar como histórico, por exemplo, ela é do tipo LIFO (last in, first out). Ou seja, os últimos adicionados serão os primeiros a ter saida.
		$this->filaDeDownloads = new SplQueue(); // Aqui estamos estanciando outro objeto collection, o SplQueue() é um outro tipo de lista que funciona de forma contrária da Stack,a Fila. Essa é do tipo FIFO (First in, first out). Ou seja, os últimos adicionados serão os últimos a ter saída também.

		$this->ranking = new Ranking(); // Criamos uma propriedade $this->ranking e atribuimos a nossa classe Ranking() a ela, no construtor da nossa classe TocadorDeMusica().
	}

	public function adicionarMusicas(SplFixedArray $musicas) {
		/* Iremos iterar sobre nosso array de uma forma um pouco diferente do padrão, pois como estamos usando um objeto, então iremos usar os métodos desse objeto. Nesse caso abaixo, o método rewind() serve para sempre ir para o inicio do array, para a posição inicial. O método valid() sempre retorna um valor booleano, ou seja, enquanto tivermos um valor valido (true) ele continua a iteração. O método next() é responsável pela iteração, como se fosse o ++ que conhcemos, então ele sempre irá avançar para o próximo elemento do array. 
		Ou seja, podemos ler o código da linha abaixo da seguinte forma:
		for($musicas inicializa na primeira posição, enquanto $musicas for valida, $musicas avança para próxima musica) */
		for($musicas->rewind(); $musicas->valid(); $musicas->next()) {
			$this->musicas->push($musicas->current()); 
			/* O método current() traz o item atual, ou seja, sempre irá trazer o item (nesse caso a musica) atual da iteração no nosso array. 
			Já o método push() é o método do objeto SplDoublyLinkedList(), que serve para adicionarmos o valor ao final da nossa lista ligada.
			Ou seja, a cada vez que realizamos a iteração, adicionamos cada item do array (musica) no final da nossa lista ligada.
			 */
		}

		$this->musicas->rewind(); // Sempre que iteramos sobre um objeto usando collections, precisamos voltar ele para a posição inicial. Iremos fazer isso usando o método rewind().
	}

	public function tocarMusica(){
		if($this->musicas->count() === 0){
			echo "Erro: Não foram encontradas músicas para tocar." . "<br>";
		} else {
			echo "Tocando música: " . $this->musicas->current() . "<br>";
		}
		/* Nesse função tocarMusica(), primeiro estamos fazendo uma condição para verificar se nossa lista ligada não está vazia, para isso usamos o método count() do nosso objeto para retornar quantos itens existem na lista ligada, se for estritamente igual a 0, então vai exibir na tela a string de erro, se não, exibi a string tocando música concatenado com a nossa lista chamando o método current() para trazer o item (musica) atual. */

		$this->historico->push($this->musicas->current()); // Aqui estamos adicionando ao final da pilha o item atual da nossa lista ligada. 

		$this->musicas->current()->tocar(); // Aqui, nosso item atual da lista esta chamando a função tocar() da nossa classe musica
	}

	public function tocarUltimaMusicaTocada(){
		echo "Tocando do histórico: " . $this->historico->pop() . "<br>";
	}

	public function adicionarMusica($musica){
		$this->musicas->push($musica);
		// Aqui estamos adicionando apenas uma musica que passamos como argumento, para o final da lista ligada. 
	}

	public function avancarMusica(){

		$this->musicas->next();
		// Nessa função, ao chamarmos ela, ela vai para o próximo item da lista ligada, em seguida é feita uma condicional para verificar se o item (musica) é valida ou não, se não for válida, vai para a posição inicial da lista ligada.

		if(!$this->musicas->valid()){
			$this->musicas->rewind();
		}
	}

	public function voltarMusica(){

		$this->musicas->prev();
		// Nessa função, ao chamarmos ela, ela vai para o item anterior da lista ligada, em seguida é feita uma condicional para verificar se o item (musica) é valida ou não, se não for válida, vai para a posição inicial da lista ligada.

		if(!$this->musicas->valid()){
			$this->musicas->rewind();
		}
	}

	public function exibirMusicas(){
		// Nessa função, ao chamarmos ela é exibido o nome de todos os itens (músicas) da nossa lista ligada, para isso nós realizamos uma iteração na lista usando o loop for() e para cada item iterado usamos o echo apresentando o item atual com o método current().

		for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()){
			echo "Música:" . $this->musicas->current() . "<br>";
		}
	}

	public function exibirQuantidadeDeMusicas(){

		//Nessa função iremos exibir a quantidade de itens na lista ligada, (nesse caso, a quantidade de músicas). Começamos com condicional para verificar se temos itens na nossa lista, para isso verificamos com o método count se o valor é zero, se for ele exibi a string que não existe itens, se não, em seguida verificamos se o número de itens é 1, se for, então exibi a string dizendo que existe apenas 1 item na lista, se não, é exibido o número total de itens na lista.  
		if($this->musicas->count() === 0){
			echo "No momento, não existem músicas na lista.";
		} else if ($this->musicas->count() === 1) {
			echo "Você possui em sua lista, apenas " . $this->musicas->count() . "  música" . "<br>";
		} else {
			echo "Você possui em sua lista o total de: " . $this->musicas->count() . "  música" . "<br>";	
		}
	}

	public function adicionarMusicaNoComecoDaLista($musica){
		// Nessa função estamos usando o método unshift para adicionar o item que passamos como argumento para o final da nossa lista ligada.
		$this->musicas->unshift($musica);
		echo "A música " . $musica . " foi adicionada a sua lista" . "<br>";
	}

	public function removerMusicaDoComecoDaLista(){
		// Nessa função iremos usar o método shift() para removermos o primeiro item da lista. Nessa caso não passamos o argumento, pois não faz sentido,  já que o item sempre está lá. Fizemos uma condicional para verificar se temos item na lista através do método count, se não tiver ela exibi uma string dizendo que não tem, se tiver ela remove o item do começo, se tivermos só um item ele vai remover e exibir uma string dizendo que foi removido o  último item.
		
		if($this->musicas->count() === 0){
			echo "Não existem músicas na lista para ser removida." . "<br>";
		} else if($this->musicas->count() === 1){
			$this->musicas->shift();
			echo "Sua única música foi removida, agora sua lista esta vazia" . "<br>";
		} else {
			$this->musicas->shift();
		}
	}

	public function removerMusicaDoFinalDaLista(){
		//A única diferença dessa função para a função anterior é que removemos o último item da lista ligadaao invvés do primeiro, usando o método pop().
		if($this->musicas->count() === 0) {
			echo "Não existem músicas na lista para ser removida." . "<br>";
		} else if($this->musicas->count() === 1){
			$this->musicas->pop();
			echo "Sua única música foi removida, agora sua lista esta vazia" . "<br>";
		} else {
			$this->musicas->pop();
		}
	}

	public function baixarMusicas(){

		//Nessa função estamos verificando se a quantidade de itens na lista ligada $musicas, é maior que 0, se for ela itera sobre a lista e adiciona cada um dos itens na lista $listaDeDownloads, em seguida é feita a iteração nessa lista $filaDeDownloads e exibi que está baixando cada um desses itens, caso não seja maior que 0 é exibido uma string que diz que não tem itens.
		if($this->musicas->count() > 0) {

			for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
				$this->filaDeDownloads->push($this->musicas->current());
			}

			for($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next()) {
				echo "Baixando: " . $this->filaDeDownloads->current() . "..." . "<br>";
			}
		} else {
			echo "Nenhuma música para baixar.";
		}
	}

	public function exibiRanking()
	{
		// Nessa função, realizamos um loop foreach, para cada uma dos $this->musicas, armazenamos cada uma na variável $musica, e para cada uma executamos o méotodo do SplHeaper chamado insert(), e colocamos como argumento nossa $musica. Esse método vai inserir cada uma das músicas no nosso ranking. 
		foreach($this->musicas as $musica){
			$this->ranking->insert($musica);
		}

		// Nesse segundo foreach para cada musica do ranking é exibido o nome da musica e o número de vezes tocadas. 
		foreach($this->ranking as $musica){
			echo "Música: " . $musica->getNome() . "- " . $musica->vezesTocadas() . "<br>"; 
		}
	}
}