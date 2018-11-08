<?php
    class bottomSheets{
        public function __contruct($title, $message){
            $return =
                '<div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2>'.$title.'</h2>
                        </div>
                        <div class="modal-body">
                            <p>'.$message.'</p>
                        </div>
                    </div>

                </div>';
        }
    }
?>