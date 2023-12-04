<div class="modal fade" id="exampleModal%s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div class="container-fluid pt-3 px-3">
      <div class="cafeclaro rounded p-4">

          <div class="naranja BarraEtiqueta pb-1 mt-2 rounded">
              <h5 class=" pt-2 text-center ">EDITAR PEDIDO</h5>
          </div>
          <!-- Form Start -->
          <div class="container-fluid px-4">
              <div class="cafeoscuro rounded h-100 p-3 pt-3 pb-1 w-100">
                  <form class="row" method="post" name="formularioPedido">
                      <div class="col-sm-12 col-xl-12">
                          <div class="mb-3">
                              <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                              <select value="%s" class="form-select mb-3 grispan" name="nombre" aria-label="Default select example" oninput="obtenerPrecios()">
                                            <option selected>Seleccionar cliente</option>
                                            <?php
                                            $nomCliente = "SELECT nombre FROM Clientes;";
                                            $conNom = mysqli_query($conexion, $nomCliente);
                                            while ($fila = mysqli_fetch_array($conNom)) {
                                                printf('<option class="naranja" value="%s">%s</option>', $fila['nombre'], $fila['nombre']);
                                            }
                                            ?>
                                        </select>
                          </div>
                          <div>
                            

                              <div>
                                        
                              <div class="row">
                              
                              <div class="col-lg-3">
                              <label style="color: white;">Producto</label>
                              <input type="text" name="" id="nombreu" class="form-control input-sm">
                              </div>

                              <div class="col-lg-3">
                              <label style="color: white;">Cantidad</label>
                              <input type="text" name="" id="apellidou" class="form-control input-sm">
                              </div>

                              <div class="col-lg-3">
                              <label style="color: white;">Precio</label>
                              <input type="text" name="" id="emailu" class="form-control input-sm">
                              </div>

                              <div class="col-lg-3">
                              <label style="color: white;">Costo Total</label>
                              <input type="text" name="" id="telefonou" class="form-control input-sm">
                              </div>

                              </div>
                          </div>
                              
                          </div>
                          <div>
                              <button class="btn" type="button" onclick="agregarPrductos()">Agregar producto</button>
                          </div>
                      </div>

              <div class="col-sm-12 col-xl-12">
                  

                      <div class="mb-3 ">
                          <label for="floatingTextarea" class="Text mt-2">Productos Agregados</label>               
                          <textarea readonly style="background: #9c886f;" class="form-control grispan mt-2 rea" name="descripcion" placeholder="Agrega un Producto" id="floatingTextarea" style="height: 100px;"></textarea>
                    
                       </div>

                          <div>
                              <button class="btn" type="button" onclick="eliminarProuctos()">Eliminar Producto</button>
                          </div>

                      <div class="mb-3">
                          <label for="floatingTextarea" class="Text mt-2">Descripción del Pedido</label>
                          <textarea class="form-control grispan mt-2" name="descripcion" placeholder="Descripción" id="floatingTextarea" style="height: 100px;"></textarea>
                      </div>
                 
                      <div class=" col-lg-4">
                         <h6> Costo Total:</h6>
                          <div ><label class="display-4" style="color: white;">$</label></div>
                      </div>
               

                  <div class="pt-4 pb-4">
                      <div class="row">
                          <label class="Text col-6">Fecha Realizado</label>
                          <label class="Text col-6">Fecha Entrega</label>

                      </div>
                      <div class="row">
                          <div class="col-6">
                              <input type="date" id="fechaActual" name="fechaRegistro" value="2023-12-04" readonly>
                          </div>
                          <div class="col-6">
                              <input type="date" name="fechaEntrega" class="date col-9">
                          </div>
                      </div>
                  </div>

              </div>

              

              </form>
          </div>

      </div>
  </div>
  <!-- Form End -->
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>