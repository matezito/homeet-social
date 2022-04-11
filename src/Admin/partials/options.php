<div class="warp">
    <h1>Configurar Homeet Social</h1>
    <form method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th>Facebook ID</th>
                    <td>
                        <input type="text" class="regular-text" name="_homeet_facebook_id" value="<?php echo get_option('_homeet_facebook_id')?>">
                    </td>
                </tr>
                <tr>
                    <th>Facebook Secrete</th>
                    <td>
                        <input type="text" class="regular-text" name="_homeet_facebook_secrete" value="<?php echo get_option('_homeet_facebook_secrete')?>">
                    </td>
                </tr>
                <tr>
                    <th>Google ID</th>
                    <td>
                        <input type="text" class="regular-text" name="_homeet_google_id" value="<?php echo get_option('_homeet_google_id')?>">
                    </td>
                </tr>
                <tr>
                    <th>Google Secrete</th>
                    <td>
                        <input type="text" class="regular-text" name="_homeet_google_secrete" value="<?php echo get_option('_homeet_google_secrete')?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" class="button button-primary" value="Guardar">
        </p>
    </form>
</div>