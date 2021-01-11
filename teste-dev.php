<?php
/*
	Plugin name: Busca Repositórios - Teste Dev
	Description: Esse sistema foi desenvolvido para realizar busca de repositórios de usuarios do git e está utilizando a API disponibilizada pelo proprio Git.
	Version:1.0
	Author: Cristian Yamasato
	License: GPLv2
*/

	function teste_dev( $test_dev ) {
		$html = '
		<div>
		<div>
			<h1>Pesquisador de repositórios(Teste Dev)</h1>
			 <p>Esse sistema foi desenvolvido para realizar busca de repositórios de usuarios do git e está utilizando a API disponibilizada pelo proprio Git.</p>
		</div>
	    	<form>			 
				  <div ">
				    <label>Digite o usuário para buscar o repositório</label>
				    <input type="text" id="searchUser" name="user" placeholder="Pesquisar">
				  </div>			  
			</form>
	    </div>
	    <div >
	      <table >
	        <thead>
	          <tr >
	            <th >ID</th>
	            <th>Nome</th>
	            <th>Repositório no git</th>
	            <th >Baixe o repositório</th>
	          </tr>
	        </thead>
	        <tbody>
	          
	        </tbody>
	      </table>
	    </div> 	 	
	  
	  	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>'
	  	.
	  	"<script >
	    $(document).ready(function(){

		  $('#searchUser').on('keyup', function(e){//Pegando valor que esta sendo digitado no input #seachUser
		    
		    let username = e.target.value; // definindo o valor do username
		     
		    if(username!='')  { // verifica se username esta vazio
		    
		      var request = new XMLHttpRequest(); //instanciando o request
		      
		      request.open('GET', 'https://api.github.com/users/'+username+'/repos', true); //requisião da api

		        request.onload = function () {
		        var data = JSON.parse(this.response); //armazenando o dados do json em objeto

		        var statusHTML = ''; 

		          $.each(data, function(i, status) {
		            statusHTML += '<tr>';
		            statusHTML += '<td>' + status.id + '</td>';
		            statusHTML += '<td>' + status.name + '</td>';
		            statusHTML += '<td><a href='+status.html_url+'>Acessar</a></td>';
		            statusHTML += '<td><a href=' + status.html_url +'/archive/master.zip > Download</a></td>';
		            statusHTML += '</tr>';
		          });//Montando o HTML com os valores que foram armazenados em data

		        $('tbody').html(statusHTML);//Acresentando o HTML que foi montado na pagina
		        }

		      request.send();//enviando a requesição 
		    }
		  });
		});
	    </script>";
		$teste_resultado = "$html";
		$teste_resultado .= $test_dev;

	return $teste_resultado;
	}
	
add_filter( 'the_content', 'teste_dev' );
