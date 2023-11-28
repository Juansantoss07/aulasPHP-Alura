<?php

class TocadorDeMusica {

	private $musicas;

	public function __construct(){
		/* O objeto SplDoublyLinkedList() serve para criar uma lista ligada, ou seja, cada item vai estar ligado ao outro item da nossa array (da nossa lista). Isso é ótimo para quando queremos navegar entre os itens do array  */
		$this->musicas = new SplDoublyLinkedList();
		$this->musicas->rewind(); // Precisamos deixar a lista ligada sempre na posição inicial, então é de boa prática passar o método rewind() já no construtor da classe também.
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
			echo "Você possui em sua lista, apenas " . $this->musicas->count() . "  música";
		} else {
			echo "Você possui em sua lista o total de: " . $this->musicas->count() . "  música";	
		}
	}

	public function adicionarMusicaNoComecoDaLista($musica){
		// Nessa função estamos usando o método unshift para adicionar o item que passamos como argumento para o final da nossa lista ligada.
		$this->musicas->unshift($musica);
	}
}