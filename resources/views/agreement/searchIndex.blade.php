@include ('layouts/main')
@yield ('scripts')
@yield ('header')
<div id="searchForm">
@include ('agreement.searchForm')
</div>
<div id="searchResults"></div>

{{ csrf_field() }}

<div class="modal fade" id="additionalPersonModal" tabindex="-1" role="dialog" aria-labelledby="additionalPersonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="additionalPersonLabel">Įgalioto asmens pridėjimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body additional-person-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success additionalPersonDismiss" data-dismiss="modal">Uždaryti</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agreementCancelModal" tabindex="-1" role="dialog" aria-labelledby="agreementCancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agreementCancelModalLabel">Ar tikrai norite nutraukti sutartį?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body agreement-cancel-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary cancelAgreementBack" style="display: none;" data-dismiss="modal">Baigti</button>
                <button type="button" class="btn btn-success cancelAgreementDismiss" data-dismiss="modal">Ne</button>
                <button type="button" class="btn btn-danger cancelAgreementConfirm">Taip</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userFileModal" tabindex="-1" role="dialog" aria-labelledby="userFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userFileModalLabel">Naudotojo sutarties failai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body user-file-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary userFileBack" data-dismiss="modal">Baigti</button>
            </div>
        </div>
    </div>
</div>

<script>
       function searchForm()
       {
           event.preventDefault();
           var formData = $('#search_form').serialize();
            $.ajax({
               url:"{{route('epasirasymas.agreement_search.searchForm')}}",
               data: formData,
               method:"POST",
               success:function(data)
               {
                   $('#searchForm').html(data);
               }
           });
       }

       function searchResults(useLocalStorage)
       {
           event.preventDefault();

           if (useLocalStorage === undefined) {
               formData = $('#search_form').serialize();
           } else {
               formData = localStorage.getItem('formData');
           }

           if (formData !== undefined) {
               localStorage.setItem('formData', formData);

               $.ajax({
                   url: "{{route('epasirasymas.agreement_search.searchResults')}}",
                   data: formData,
                   method: "POST",
                   success: function(data)
                   {
                       $('#searchResults').html(data);
                   }
               });
           }
       }

       function updateOk(agreement_id)
       {
           var _token = $('input[name="_token"]').val();
           $.ajax({
               url: "{{route('epasirasymas.agreement_search.updateOk')}}",
               data: {agreement_id : agreement_id, _token : _token},
               method: "POST",
               success: function(data)
               {
                   null;
               }
           });
       }

       function cancelAgreement(agreement_id)
       {
           var _token = $('input[name="_token"]').val();
           $.ajax({
               url: "{{route('epasirasymas.agreement_search.agreementCancelBody')}}",
               data: {agreement_id : agreement_id, _token : _token},
               method: "POST",
               success: function(data)
               {
                   $('.cancelAgreementBack').hide();
                   $('.cancelAgreementDismiss').show();
                   $('.cancelAgreementConfirm').show();
                   $('.agreement-cancel-body').html('');
                   $('.agreement-cancel-body').html(data);
                   $('.cancelAgreementConfirm').attr('onclick', 'cancelAgreementConfirm('+agreement_id+')');
               }
           });
       }

       function cancelAgreementConfirm(agreement_id)
       {
           var _token = $('input[name="_token"]').val();
           $.ajax({
               url: "{{route('epasirasymas.agreement_search.agreementCancelConfirm')}}",
               data: {agreement_id : agreement_id, _token : _token},
               method: "POST",
               success: function(data)
               {
                   $('.cancelAgreementBack').show();
                   $('.cancelAgreementDismiss').hide();
                   $('.cancelAgreementConfirm').hide();
                   $('.agreement-cancel-body').append(data);
                   $('.cancelAgreementConfirm').removeAttr('onclick');
                   searchResults(1);
               }
           });
       }

       function agreementFileList(agreement_id)
       {
          var _token = $('input[name="_token"]').val();
          $.ajax({
              url: "{{route('epasirasymas.agreement_search.agreementFileList')}}",
              data: {agreement_id : agreement_id, _token : _token},
              method: 'POST',
              success: function(data)
              {
                  $('.user-file-body').html(data);
              }
          });
       }

       function uploadFile()
       {
           event.preventDefault();
           var formData = new FormData($("#uploadForm")[0]);
           $.ajax({
               type: 'POST',
               url: "{{route('epasirasymas.agreement_search.uploadFile')}}",
               processData: false,
               contentType: false,
               cache: false,
               data : formData,
               success: function(data)
               {
                   if ($.isNumeric(data)) {
                       agreementFileList(data);
                   }
               }
           });
       }

       function deleteFile(fileId)
       {
           event.preventDefault();
           var _token = $('input[name="_token"]').val();
           $.ajax({
               type: 'POST',
               url: "{{route('epasirasymas.agreement_search.deleteFile')}}",
               data: {_token : _token, fileId : fileId},
               success: function(data)
               {
                   if ($.isNumeric(data)) {
                       agreementFileList(data);
                   }
               }
           });
       }

       function additionalPersonView(agreement_id)
       {
           event.preventDefault();
           var _token = $('input[name="_token"]').val();
           $.ajax({
               type: 'POST',
               url: "{{route('epasirasymas.agreement_search.additionalPerson')}}",
               data: {_token : _token, agreement_id : agreement_id},
               success: function(data)
               {
                   $('.additional-person-body').html(data);
               }
           });
       }

       function additionalPersonSave()
       {
           event.preventDefault();
           var arguments = $('.additionalPersonSave').serialize();
          // var _token = $('input[name="_token"]').val();
          // arguments = arguments+'_token='+_token;
           console.log(arguments);
           $.ajax({
               type: 'POST',
               url: "{{route('epasirasymas.agreement_search.additionalPerson')}}",
               data: arguments,
               success: function(data)
               {
                   $('.additional-person-body').html(data);
               }
           });
       }

</script>