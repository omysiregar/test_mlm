<!-- [ breadcrumb ] start -->

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <!-- <h5 class="m-b-10">ASPIRASI - PKM Biatan</h5> -->
                </div>
                <ul class="breadcrumb">
                    <?php $segments = $this->uri->segments ?>
                    <?php foreach ($segments as $key => $data): ?>
                        <?php if(is_numeric($data)){
                            $id = $data;
                        } ?>
                    <?php endforeach; ?>
                    <?php !empty($id)? array_pop($segments) : $segments  ?>
                        

                    <?php foreach ($segments as $segment): ?>
                    
                        <?php 
                            $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                            $explode_url = explode('/',$url);
                            $is_active = end($explode_url) == end($segments);
                        ?>
                        <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                            <?php if($is_active && !empty($id)): ?>
                                    <a href="<?php echo site_url($url."/".$id) ?>"><?php echo ucfirst($segment) ?></a>
                            <?php else: ?>
                                <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- [ breadcrumb ] end -->
