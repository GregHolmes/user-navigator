
  
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Google Maps</h4>
                </div>
                <div class="modal-body">

                <iframe id="lol" width="100%" height="400" frameborder="0" style="border:0" src="" allowfullscreen>
                </iframe>                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


 <button type="button" class="btn btn-primary" data-enc="lol" data-toggle="modal" id="soman">View Map</button>

<script type="text/javascript">

    var q = "https://www.google.com/maps/embed/v1/place?key=KEY&q=place_id:"    
    $('#soman').on('click', function() {
        $("#lol").attr("src",q+"ChIJS5pTm7QNCDsR3fcoTL0e8p0");
        $("#myModal").modal();
    });
    
</script>
