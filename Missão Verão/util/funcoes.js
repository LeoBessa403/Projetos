
function verifica_inscricao(form_cadastro)
{	  		 
		 if (form_cadastro.cad_nome.value == "")
		 {
			 mensagem = "Por Favor, Preencha o Campo Nome Completo!";
			 alert(mensagem);
			  return false;
		 }		 
			 
		 if (form_cadastro.cad_prof_resp.value == "")
		 {
			 mensagem = "Por Favor, Selecione um Professor!";
			 alert(mensagem);
			 return false;
		 }	
		 
		 if (form_cadastro.pes_valor.value == "")
		 {
			 mensagem = "Por Favor, Preencha o Pesodo Participante!";
			 alert(mensagem);
			 return false;
		 }	
		 
		  verifica_peso = isNaN(form_cadastro.pes_valor.value);
		  if (verifica_peso == true)
		  {
		  	alert("Digite apenas um Peso Valido");
			return false;
		  }
		  
}


function verifica_inscricao2(form_cadastro2)
{	  		 
		 if (form_cadastro2.cad_nome.value == "")
		 {
			 mensagem = "Por Favor, Preencha o Campo Nome Completo!";
			 alert(mensagem);
			  return false;
		 }		 
			 
		 if (form_cadastro2.cad_prof_resp.value == "")
		 {
			 mensagem = "Por Favor, Selecione um Professor!";
			 alert(mensagem);
			 return false;
		 }	
		 
		 if (form_cadastro2.pes_valor.value == "")
		 {
			 mensagem = "Por Favor, Preencha o Pesodo Participante!";
			 alert(mensagem);
			 return false;
		 }	
		 
		  verifica_peso = isNaN(form_cadastro2.pes_valor.value);
		  if (verifica_peso == true)
		  {
		  	alert("Digite apenas um Peso Valido");
			return false;
		  }
	}

	  function verifica_inscricao3(form_cadastro3)
	  {	  		 
		 if (form_cadastro3.pes_valor.value == "")
		 {
			 mensagem = "Por Favor, Preencha o Pesodo Participante!";
			 alert(mensagem);
			 return false;
		 }	
		 
		  verifica_peso = isNaN(form_cadastro3.pes_valor.value);
		  if (verifica_peso == true)
		  {
		  	alert("Digite apenas um Peso Valido");
			return false;
		  }
	}
	
	