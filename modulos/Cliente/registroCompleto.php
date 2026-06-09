<div class="container " align="center" style="background-color: transparent;">    

	<div class="card" style="background-color: transparent;">
		<h2>REGISTRO CLIENTE</h2>

  <form name="form" method="post" id="form" action="?mod=guardarC.php" class="form-horizontal">
            <table>
                <tr>
                    	<div class="input-group">
                   <td>     <label>USERNAME: </label></td>
                     <td>   <input type="text" class="form-control" id="username" name="username" value="" placeholder="Nombre de Usuario" autofocus="" required="">                       <br>     </td>          
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                <td>       <label>CONTRASEÑA:</label></td>
                <td>        <input type="password" class="form-control" id="pasw" name="pasw" placeholder="Contraseña" required=""><br></td>
                    </div>                         
                </tr>                                
  				<tr><div class="input-group">
				  	<td>  <label>RAZON SOCIAL:</label></td>
				  	<td> <input type="texto" class="form-control" id="razon" name="razon" placeholder="Razon Social" required=""><br></td>
				  </div>    
				</tr>
  					
                     
                       
                                                                                  
   </tr>                                
  				<tr><div class="input-group">
				  	<td> <label>NIT / CI:</label></td>
				  	<td><input type="number" class="form-control" id="nit" name="nit" placeholder="NIT o CI" required="">  <br> </td>
				 </div></tr>
                      
  				<tr><div class="input-group">
				  	<td><label>TELÉFONO: </label></td>
				  	<td>  <input type="NUMBER" class="form-control" id="tel" name="tel" placeholder="Teléfono" required="">    <br>      </td></div>  
				</tr> 
        <br>  
        <tr><div class="input-group">
            <td><label>ESTADO: </label> <br></td>
            <td>  <select id="estado" name="estado" class="custom-select" required=""><option value="ACTIVO">ACTIVO</option> <OPTION VALUE="INACTIVO">INACTIVO</OPTION> </select> <br> </td></div>  
        </tr>    
      
				<tr>   <div class="form-group"><div class="col-sm-12 controls ">
					<td colspan="2" align="center"><button class="btn btn-primary " align="center">
                            <span class="badge badge-pill" style="font-size: 1em "><p class="font-weight-light"><i class="fas fa-edit  "></i> REGISTRAR</p></span></button>  </td>
                        </div>
                    </div>
				</tr>                                                       
            </table>
     </form>     


<table class="table"><tr>
  <td> <a href="?mod=listaC"><span class="badge badge-pill" style="font-size: 1em "><p class="font-weight-light"><i class="fas fa-arrow-alt-circle-left  "></i>Lista Clientes</p></span> </a>
  </td>
  </tr></table>
		
	
	</div>

