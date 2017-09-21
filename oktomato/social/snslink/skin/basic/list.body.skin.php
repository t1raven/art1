                    <tr>
                      <th scope="row"><?php echo($row['sns_name']);?></th>
                      <td>
                        <input name="url[]" type="text" class="inp_txt w190" id="" value="<?php echo($row['sns_url']);?>" >
                        <input name="fidx[]" type="hidden" value="<?php echo($row['sns_link_idx']);?>" >
                      </td>
                    </tr>