// JavaScript Document
 $(document).ready(function(){							 
						 
			$("#create_user").validate({
						   
				rules:{
				nome:{required:true, minlength: 4},
				login:{required:true, minlength: 6},
				senha:{required: true, minlength: 6},
				email:{required: true, email:true}
				},
				
				messages:{
			    nome:{required: "Informe o Campo Nome!", minlength: "O Nome deve ser Completo"},
				login:{required: "O Login precisa ser informado", minlength: "O Login deve conter no Minimo 6 caracteres"},
				senha:{required: "Informe o Campo Senha!", minlength: "A Senha deve conter no Minimo 6 caracteres"},
				email:{required: "O E-Mail deve ser digitado!"}
				},						   

			});
			
			
  });