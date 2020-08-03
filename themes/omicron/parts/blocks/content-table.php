<div class="table-container">
<?php
    $table = get_field( 'game_table', 'options' );

    if ( ! empty ( $table ) ) {
    
        echo '<table id="game-table" border="0">';
    
            if ( ! empty( $table['caption'] ) ) {
    
                echo '<caption>' . $table['caption'] . '</caption>';
            }
    
            if ( ! empty( $table['header'] ) ) {
    
                echo '<thead>';

                $thead_array = array();
    
                    echo '<tr>';
    
                        foreach ( $table['header'] as $th ) {
                            
                            array_push($thead_array, $th);

                            if(is_page_template('template-game-table.php')):
                            
                                if($th['c'] == 'HP Current'):

                                    echo '';

                                elseif($th['c'] == 'HP Max'):
                                    
                                    echo '<th onclick="sortTable(0)">';
                                        echo 'Health Rating';
                                    echo '</th>';

                                else:

                                    echo '<th onclick="sortTable(0)">';
                                        echo $th['c'];
                                    echo '</th>';

                                endif;

                            else:

                                if($th['c'] == 'HP Max'):
                                
                                    echo '<th onclick="sortTable(0)">';
                                        echo $th['c'];
                                    echo '</th>';
                                    
                                    echo '<th onclick="sortTable(0)">';
                                        echo 'Health Rating';
                                    echo '</th>';

                                else:

                                    echo '<th onclick="sortTable(0)">';
                                        echo $th['c'];
                                    echo '</th>';

                                endif;
                            endif;
                        }
    
                    echo '</tr>';
    
                echo '</thead>';
            }
    
            echo '<tbody>';

                if('faction_post' == get_post_type()):
                    $faction = basename((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                endif;
    
                foreach ( $table['body'] as $tr ) {
                    
                    if('faction_post' == get_post_type()):

                        if(strtolower($tr[0]['c']) == $faction):

                            echo '<tr faction=' . $tr[0]['c'] . '>';

                                $table_ctr = 0;

                                $current_health = '';
            
                                foreach ( $tr as $td ) {

                                    $column =  preg_replace("/[\s_]/", "-", $thead_array[$table_ctr]['c']);

                                    if($column == 'HP-Max'):

                                        echo '<td column=' . $column .'>';
                                            echo $td['c'];
                                        echo '</td>';

                                        echo '<td column=Health-Rating>';
                                            $health_calc = $current_health / $td['c'];
                                            $health_rating = '';

                                            switch($health_calc) {
                                                case $health_calc <= 0.25:
                                                    $health_rating = 'Dying';
                                                    break;
                                                case $health_calc > 0.25 && $health_calc <= 0.75:
                                                    $health_rating = 'Damaged';
                                                    break;
                                                case $health_calc > 0.75 && $health_calc <= 1;
                                                    $health_rating = 'Healthy';
                                                    break;
                                                default:
                                                    $health_rating = 'Healthy';
                                            }
                                                
                                            echo $health_rating;
                                        echo '</td>';

                                    elseif($column == 'HP-Current'):

                                        $current_health = $td['c'];

                                        echo '<td column=' . $column .'>';
                                            echo $td['c'];
                                        echo '</td>';

                                    else:

                                        echo '<td column=' . $column .'>';
                                            echo $td['c'];
                                        echo '</td>';

                                    endif;

                                    $table_ctr ++;
                                }
            
                            echo '</tr>';

                        endif;
                    
                    elseif( is_page_template('template-game-table.php')):

                        echo '<tr faction=' . $tr[0]['c'] . '>';

                            $table_ctr = 0;

                            $current_health = '';
        
                            foreach ( $tr as $td ) {

                                $column =  preg_replace("/[\s_]/", "-", $thead_array[$table_ctr]['c']);

                                if($column == 'HP-Max'):

                                    echo '<td column=Health-Rating>';
                                        $health_calc = $current_health / $td['c'];
                                        $health_rating = '';

                                        switch($health_calc) {
                                            case $health_calc <= 0.25:
                                                $health_rating = 'Dying';
                                                break;
                                            case $health_calc > 0.25 && $health_calc <= 0.75:
                                                $health_rating = 'Damaged';
                                                break;
                                            case $health_calc > 0.75 && $health_calc <= 1;
                                                $health_rating = 'Healthy';
                                                break;
                                            default:
                                                $health_rating = 'Healthy';
                                        }
                                            
                                        echo $health_rating;
                                    echo '</td>';

                                elseif($column == 'HP-Current'):

                                    $current_health = $td['c'];

                                else:

                                    echo '<td column=' . $column .'>';
                                        echo $td['c'];
                                    echo '</td>';

                                endif;

                                $table_ctr ++;
                            }
        
                        echo '</tr>';

                    else:

                        echo '<tr faction=' . $tr[0]['c'] . '>';

                            $table_ctr = 0;

                            $current_health = '';
        
                            foreach ( $tr as $td ) {

                                $column =  preg_replace("/[\s_]/", "-", $thead_array[$table_ctr]['c']);

                                if($column == 'HP-Max'):

                                    echo '<td column=' . $column .'>';
                                        echo $td['c'];
                                    echo '</td>';

                                    echo '<td column=Health-Rating>';
                                        $health_calc = $current_health / $td['c'];
                                        $health_rating = '';

                                        switch($health_calc) {
                                            case $health_calc <= 0.25:
                                                $health_rating = 'Dying';
                                                break;
                                            case $health_calc > 0.25 && $health_calc <= 0.75:
                                                $health_rating = 'Damaged';
                                                break;
                                            case $health_calc > 0.75 && $health_calc <= 1;
                                                $health_rating = 'Healthy';
                                                break;
                                            default:
                                                $health_rating = 'Healthy';
                                        }
                                            
                                        echo $health_rating;
                                    echo '</td>';

                                elseif($column == 'HP-Current'):

                                    $current_health = $td['c'];

                                    echo '<td column=' . $column .'>';
                                        echo $td['c'];
                                    echo '</td>';

                                else:

                                    echo '<td column=' . $column .'>';
                                        echo $td['c'];
                                    echo '</td>';

                                endif;

                                $table_ctr ++;
                            }
        
                        echo '</tr>';

                    endif;
                }
    
            echo '</tbody>';
    
        echo '</table>';
    }
?>
</div>
