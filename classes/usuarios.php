<?php 

class usuarios{
	public function registroUsuario($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$updated= date('Y-m-d');
		
		$sql = "INSERT into devedores (nome, cpf, dataNasc, endereco, descricao,valor,dataVencimento,
		 updated) VALUES ('$dados[0]', $dados[1], '$dados[2]', '$dados[3]','$dados[4]','$dados[5]','$dados[6]', '$updated')";

		return mysqli_query($conexao, $sql);
	}



	public function login($dados){
			$c = new conectar();
		$conexao=$c->conexao();

		$senha = sha1($dados[1]);

		$_SESSION['usuario'] = $dados[0];
		$_SESSION['iduser'] = self::trazerId($dados);

		$sql = "SELECT * from usuarios where email = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		//echo $sql;

		if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}


	}


	public function trazerId($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT id from usuarios where email='$dados[0]' and senha = '$senha' ";
		$result = mysqli_query($conexao, $sql);
		return mysqli_fetch_row($result)[0];
	}

	public function obterDados($idusuario){

			$c = new conectar();
			$conexao=$c->conexao();

			$sql="SELECT id,
							nome,
							cpf,
							dataNasc,
							endereco,
							descricao,
							valor,
							dataVencimento
					from devedores 
					where id='$idusuario'";
			$result=mysqli_query($conexao,$sql);

			$mostrar=mysqli_fetch_row($result);

			

			$dados=array(
						'id' => $mostrar[0],
							'nome' => $mostrar[1],
							'cpf' => $mostrar[2],
							'dataNasc' => $mostrar[3],
							'endereco' => $mostrar[4],
							'descricao' => $mostrar[5],
							'valor' => $mostrar[6],
							'dataVencimento' => $mostrar[7]
						);

			return $dados;
		}

		public function atualizar($dados){
			$c = new conectar();
			$conexao=$c->conexao();


			$sql="UPDATE devedores set nome='$dados[1]',
									cpf='$dados[2]',
									dataNasc='$dados[3]',
									endereco='$dados[4]',
									descricao='$dados[5]',
									valor='$dados[6]',
									dataVencimento='$dados[7]'
									
						where id='$dados[0]'";

					

			return mysqli_query($conexao,$sql);	
		}

		public function excluir($idusuario){
			$c = new conectar();
			$conexao=$c->conexao();

			$sql="DELETE from devedores 
					where id='$idusuario'";
			return mysqli_query($conexao,$sql);
		}
	}

 ?>
