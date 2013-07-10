    <fieldset>
                        <legend align="left"><font size="3"color="red">Obras</font></legend>
                        <table border="0" >
                            <tr >
                                <td>Obras:</td>
                                <td>                                  
                                    <select name="id_obraA" id="id_obraA" class="Estilo1" onchange="from_post(this.value,'agregar','resultado','controller/agregarObraAjaxController.php')">

                                        <option value="0">Seleccionar</option>
                                        <?php
                                        for ($i = 0; $i < sizeof($obras); $i++) {
                                            ?>
                                            <option value="<?php echo $obras[$i]["id_obra"]; ?>"
                                                    title="<?php echo $obras[$i]["nom_obra"]; ?>">
                                                <?php echo "Nombre Obra: " . $obras[$i]["nom_obra"] . "  Colección  " . $obras[$i]["colec_obra"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>

                        </tr>
 </table> 
                        <div id="resultado"></div>
                    </fieldset> 