<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" id="dynamic-content">

        <h4 class="modal-title" id="showName">
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">

        <div id="modal-loader" style="display: none; text-align: center;">
        </div>

        <div id="dynamic-content">
          <!-- mysql data will load in table -->

          <div class="row">
            <div class="col-6 offset-3">

              <div id="showImage"></div>

            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <strong>Category:</strong>
              <div id="showCat"></div>
              <strong>Synopsis:</strong>
              <div id="showDesc"></div>
              <strong>No. of Episodes:</strong>
              <div id="showEp"></div>
              <strong class="d-block">Start Date / End Date:</strong>
              <div class="d-inline" id="startDate"></div>- <div class='d-inline' id="endDate"></div>
              <strong class=d-block>Producer:</strong>
              <div id="showStu"></div>
            </div>
          </div>

    </div>

  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <div id="watchlistBtn"></div>
  </div>

</div>
</div>
</div>