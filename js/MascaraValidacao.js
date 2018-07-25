// JavaScript Document
//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

//Validação de numero
 function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          //campo.value = "";
		  document.getElementById("msg10").innerHTML="Apenas números!";
		  document.getElementById("num").focus(); 
        }
		else
		document.getElementById("msg10").innerHTML=" ";	
    }

	//Validação de Preço Real
 function somenteNumerosPrecoR(precoR) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = precoR;
        if (er.test(campo.value)) {
          //campo.value = "";
		  document.getElementById("msg19").innerHTML="Apenas números!";
		  document.getElementById("precoR").focus(); 
        }
		else
		document.getElementById("msg19").innerHTML=" ";	
    }
	
		//Validação de Preço c/ Desconto
 function somenteNumerosPrecoD(precoD) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = precoD;
        if (er.test(campo.value)) {
          //campo.value = "";
		  document.getElementById("msg20").innerHTML="Apenas números!";
		  document.getElementById("precoD").focus(); 
        }
		else
		document.getElementById("msg20").innerHTML=" ";	
    }
	
	//Validação de numero de dias de atraso
 function somenteNumerosDias(numDias) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = numDias;
        if (er.test(campo.value)) {
          //campo.value = "";
		  document.getElementById("msg17").innerHTML="Apenas números!";
		  document.getElementById("numDias").focus(); 
        }
		else
		document.getElementById("msg17").innerHTML=" ";	
    }

	//Validação de numero de dias de visitas tecnicas
 function somenteNumerosVisitas(numVisitas) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = numVisitas;
        if (er.test(campo.value)) {
          //campo.value = "";
		  document.getElementById("msg18").innerHTML="Apenas números!";
		  document.getElementById("numVisitas").focus(); 
        }
		else
		document.getElementById("msg18").innerHTML=" ";	
    }
	
	
//adiciona mascara de data
function formata_data(obj){
switch (obj.value.length) {
    case 2:
        obj.value = obj.value + "/";
        break;
    case 5:
        obj.value = obj.value + "/";
        break;
}
}

//Validar data nascimento
function VerificaDataNasc(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg11").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("data").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg11").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("data").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg11").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("data").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano > vano) // && mes > vmes && dia > vdia) 
		  {	
	  
	        document.getElementById("msg11").innerHTML="Ano incorreto!";
		    document.getElementById("data").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg11").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg11").innerHTML="Formato inválido de data.";
		    document.getElementById("data").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}

//Validar data Admissão
function VerificaDataAdm(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg12").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("dataAdm").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg12").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("dataAdm").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg12").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("dataAdm").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano > vano)
		  {	
	  
	        document.getElementById("msg12").innerHTML="Ano incorreto!";
		    document.getElementById("dataAdm").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg12").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg12").innerHTML="Formato inválido de data.";
		    document.getElementById("dataAdm").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}


//Validar data Admissão
function VerificaDataInicioR(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg16").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("dataInicioR").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg16").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("dataInicioR").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg16").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("dataInicioR").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano > vano)
		  {	
	  
	        document.getElementById("msg16").innerHTML="Ano incorreto!";
		    document.getElementById("dataInicioR").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg16").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg16").innerHTML="Formato inválido de data.";
		    document.getElementById("dataInicioR").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}



//Validar data Desligamento
function VerificaDataD(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg13").innerHTML="O mês especificado contém no máximo 30 dias.";
		  //document.getElementById("dataD").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg13").innerHTML="O mês especificado contém no máximo 28 dias.";
		 // document.getElementById("dataD").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg13").innerHTML="O mês especificado contém no máximo 29 dias.";
		   // document.getElementById("dataD").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano>vano) // && mes>vmes && dia>vdia) 
		  {	
	  
	        document.getElementById("msg13").innerHTML="Ano incorreto!";
		  //  document.getElementById("dataD").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg13").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg13").innerHTML="Formato inválido de data.";
		   // document.getElementById("dataD").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}

//verifica data final do projeto
function VerificaDataFinalPlan(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg14").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("dataFinalPlan").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg14").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("dataFinalPlan").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg14").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("dataFinalPlan").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano>vano) // && mes>vmes && dia>vdia) 
		  {	
	  
	        document.getElementById("msg14").innerHTML="Ano incorreto!";
		    document.getElementById("dataFinalPlan").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg14").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg14").innerHTML="Formato inválido de data.";
		    document.getElementById("dataFinalPlan").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}

//verifica data final planejado do projeto
function VerificaDataFinal(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg19").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("dataFinal").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg19").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("dataFinal").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg19").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("dataFinal").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano>vano) // && mes>vmes && dia>vdia) 
		  {	
	  
	        document.getElementById("msg19").innerHTML="Ano incorreto!";
		    document.getElementById("dataFinal").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg19").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg19").innerHTML="Formato inválido de data.";
		    document.getElementById("dataFinal").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}


//verifica data final da assinatura
function VerificaDataAss(DATA)
{
   var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
   var msgErro = 'Formato inválido de data.';
   var vdt = new Date();
   var vdia = vdt.getDate();
   var vmes = vdt.getMonth();
   var vano = vdt.getFullYear();
   
   
   if ((DATA.value.match(expReg)) && (DATA.value!=''))
    {	var dia = DATA.value.substring(0,2);
        var mes = DATA.value.substring(3,5);
		var ano = DATA.value.substring(6,10);
		if((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30)) 
		{	
				
	      document.getElementById("msg15").innerHTML="O mês especificado contém no máximo 30 dias.";
		  document.getElementById("dataAss").focus(); 
		  //alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
		  //DATA.value='';
		  //DATA.focus();
			return false;
			
		}
		else
		{ //1
		  if(ano%4!=0 && mes==2 && dia>28)
		  {	
	        document.getElementById("msg15").innerHTML="O mês especificado contém no máximo 28 dias.";
		    document.getElementById("dataAss").focus(); 
		//	alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
	    //DATA.value='';
		//	DATA.focus();
			return false;
			
		  }
		else
		{ //2
		  if(ano%4==0 && mes==2 && dia>29)
		  {	
	        document.getElementById("msg15").innerHTML="O mês especificado contém no máximo 29 dias.";
		    document.getElementById("dataAss").focus(); 
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias.");
		    //DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		else
   	    { //3
		   if (ano>vano) // && mes>vmes && dia>vdia) 
		  {	
	  
	        document.getElementById("msg15").innerHTML="Ano incorreto!";
		    document.getElementById("dataAss").focus();
			//alert("Ano incorreto!");
			//DATA.value='';
			//DATA.focus();
			return false;
			
		  }
		  else
		  { //4
		    //alert ("Data correta!");
			 document.getElementById("msg15").innerHTML="";
		    return true;
		  } //4-else
		  } //3-else
		  }//2-else
		  }//1-else
		  } else
		  { //5
		  	document.getElementById("msg15").innerHTML="Formato inválido de data.";
		    document.getElementById("dataAss").focus();
			//alert(msgErro);
			//DATA.value='';
			//DATA.focus();
			return false;
			
		   } //5-else
}

//adiciona mascara do celular
function MascaraCelular(cel){  
        if(mascaraInteiro(cel)==false){
                event.returnValue = false;
        }       
        return formataCampo(cel, '(00) 00000-0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
		{
			document.getElementById("msg6").innerHTML="Número de Telefone Inválido!";
			document.getElementById("tel").focus(); 
		}
		else
		{
			document.getElementById("msg6").innerHTML="";
		}
}

//valida celular
function ValidaCelular(cel){
        exp = /\(\d{2}\)\ \d{5}\-\d{4}/
        if(!exp.test(cel.value))
		{
			document.getElementById("msg8").innerHTML="Número de Celular Inválido!";
			document.getElementById("cel").focus(); 
		}
		else
		{
			document.getElementById("msg8").innerHTML="";
		}
}

//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value)){
			document.getElementById("msg5").innerHTML="CEP Invalido!";
			document.getElementById("cep").focus(); 				
		}
		else
		{
			document.getElementById("msg5").innerHTML="";
		}			
}


//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)
		{       
			document.getElementById("msg7").innerHTML="CPF Invalido!";
			document.getElementById("cpf").focus(); 
		}
		else
		{
			document.getElementById("msg7").innerHTML="";
		}
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito)  
        {      
			document.getElementById("msg4").innerHTML="CNPJ Invalido!";
			document.getElementById("cnpj").focus(); 
		}
		else
		{
			document.getElementById("msg4").innerHTML="";
		}

}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}

//verifica email pessoa fisica
	function verificaEmailPF()
	{
		var email = document.CadastroCliente.txtEmail.value; 
		if ((email.length != 0) && ((email.indexOf("@") < 1) || (email.indexOf('.') < 2)))
		  {
				document.getElementById("msg").innerHTML="E-mail incorreto!";
				document.CadastroCliente.txtEmail.focus(); 
		  }
		  else
		  {
				document.getElementById("msg").innerHTML="";
		  }
	}
 AtivarFuncionario
 
 //verifica email para ativar acesso de funcionario 
	function verificaEmailAA()
	{
		var email = document.AtivarFuncionario.txtEmail.value; 
		if ((email.length != 0) && ((email.indexOf("@") < 1) || (email.indexOf('.') < 2)))
		  {
				document.getElementById("msg").innerHTML="E-mail incorreto!";
				document.AtivarFuncionario.txtEmail.focus(); 
		  }
		  else
		  {
				document.getElementById("msg").innerHTML="";
		  }
	}
 //verifica email pessoa Funcionario
	function verificaEmailFunc()
	{
		var email = document.CadastroFuncionario.txtEmail.value; 
		if ((email.length != 0) && ((email.indexOf("@") < 1) || (email.indexOf('.') < 2)))
		  {
				document.getElementById("msg").innerHTML="E-mail incorreto!";
				document.CadastroFuncionario.txtEmail.focus(); 
		  }
		  else
		  {
				document.getElementById("msg").innerHTML="";
		  }
	}
 
//verifica email pessoa juridica
	function verificaEmailPJ()
	{
		var email = document.CadastroPessoaJ.txtEmailE.value; 
		var email2 = document.CadastroPessoaJ.txtEmailR.value; 
		
		if ((email.length != 0) && ((email.indexOf("@") < 1) || (email.indexOf('.') < 2)))
		  {
				document.getElementById("msg").innerHTML="E-mail incorreto!";
				document.CadastroPessoaJ.txtEmailE.focus(); 
		  }
		  else
		  {
				document.getElementById("msg").innerHTML="";
		  }
		  
		  if ((email2.length != 0) && ((email2.indexOf("@") < 1) || (email2.indexOf('.') < 2)))
		  {
				document.getElementById("msg9").innerHTML="E-mail incorreto!";
				document.CadastroPessoaJ.txtEmailR.focus(); 
		  }
		  else
		  {
				document.getElementById("msg9").innerHTML="";
		  }
	}
	
//Verifica se os campos de email são iguais
		function validarEmail(){ 
			var email = document.AtivarFuncionario.txtEmail.value; 
			var email2 = document.AtivarFuncionario.txtEmailR.value; 
			if(email!= email2){ 
				document.getElementById("msg1").innerHTML="Atenção! Endereço de e-mail diferente!";
				document.AtivarFuncionario.txtEmailR.focus(); 
			} 
			if(email == email2)
			{
				document.getElementById("msg1").innerHTML="";
			}
		}

//Verifica se a senha possui os caracteres minimos necessarios
		function verificaSenha()
		{
				var senha = document.AtivarFuncionario.txtSenha.value;
					if (senha.value=="" || senha.length < 6) {
						document.getElementById("msg2").innerHTML="A senha deve conter no mínimo 6 caracteres."; 
						document.AtivarFuncionario.txtSenha.focus(); 
					}
					else
						document.getElementById("msg2").innerHTML="";
		}
	
//Verifica se as senhas são iguais
		function validarConfirmacao(){ 
			var senha = document.AtivarFuncionario.txtSenha.value; 
			var confirmacao = document.AtivarFuncionario.txtSenhaR.value; 
			if(senha != confirmacao){ 
				document.getElementById("msg3").innerHTML="Atenção! Senhas Diferentes!";
				//alert("Atenção! Senhas Diferentes!") 
				document.AtivarFuncionario.txtSenhaR.focus(); 
			} 
			if(senha == confirmacao)
			{
				document.getElementById("msg3").innerHTML="";
			}
		} 
		
