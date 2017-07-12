        <!-- CSS -->
        <section id="main">

            <section id="content">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>View Users</h2>
                        
                        <ul class="actions">
                            <li>
                                <a href="data-tables.html">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="data-tables.html">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="data-tables.html" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="data-tables.html">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="data-tables.html">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="data-tables.html">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>                          
                                        
                    <div class="card">
                        <div class="card-header">
                            <h3 class="c-blue text-center text-uppercase">Site Users</h3>
                        </div>
                        
                        <table id="data-table-command" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric">ID</th>
                                    <th data-column-id="fullname">Full Name</th>
                                    <th data-column-id="useremail" data-order="desc">Email</th>
                                    <th data-column-id="username">Username</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($users)){ ?>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user->uid; ?></td>                                 
                                    <td><?= $user->full_name; ?></td>
                                    <td><?= $user->user_email; ?></td>
                                    <td><?= $user->username; ?></td>
                                </tr> 
                                <?php endforeach; ?>
                                <?php }else{echo 'no Users';}?>                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
        
    
   
        <script src="<?php echo base_url(); ?>assets/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>

        <!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Basic Example
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                });
                
                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true
                });
                
                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
                                "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            });
        </script>
    </body>
  </html>