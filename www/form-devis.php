<form name="formcontact" method="post"  onSubmit="return checkForm()">
              <input type="hidden" name="public_mail" value="" />
              <input type="hidden" name="plaster" value="" />
                <table width="396" border="0" align="center" cellpadding="2" cellspacing="2" class="txtbase">
                  <tr>
                    <td colspan="2" class="txt1">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="178" class="txt1"><span class="Style9">Votre nom * :</span></td>
                    <td width="204" class="txt1">
                    <input name="nom" size="25" maxlength="50" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Votre E-mail * : </span></td>
                    <td class="txt1">
                    <input name="lemail" size="25"  maxlength="50" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Téléphone : </span></td>
                    <td class="txt1">
                    <input name="telephone" size="25" maxlength="20" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="txt1"><hr/></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Adresse :</span></td>
                    <td class="txt1">
                    <input name="adresse" size="25" maxlength="100" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Ville :</span></td>
                    <td class="txt1">
                    <input name="ville" size="25" maxlength="100" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Code postal :</span></td>
                    <td class="txt1">
                    <input name="cp" size="25" maxlength="100" style="width:200px;"></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="txt1"><hr/></td>
                  </tr>
                  <tr>
                    <td class="txt1"><span class="Style9">Votre demande * : <br />
                    </span></td>
                    <td class="txt1"><span class="Style9">
                      <textarea cols="23" name="message" rows="7" style="width:200px;"></textarea>
                    </span> </td>
                  </tr>
                  <tr>
                    <td colspan="2" valign="top" class="txt1"><span class="Style9">
                    <br />
                    * : champs obligatoires
                    </span></td>
                  </tr>  
                  <tr>
                    <td colspan="2" align="center" valign="top" class="txt1">
                     <br>
                    <input name="annulation" type=reset value=":: Annuler ::">
                    <input name="envoi" type=submit value=":: Poster votre message ::"></td>
                  </tr>
              </table>
                <br />
        </form>