<div class="container">
    <div class="modal fade" id="commentAddModal" tabindex="-1" role="dialog" aria-labelledby="commentAddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h3 class="modal-title">
                        Įrašykite komentarą
                    </h3>
                </div>
                <div class="modal-body">
                    <form action="{{route('epasirasymas.saveComment')}}" method="post">
                        @csrf
                        <input type="text" name="user-application-id" id="comment-modal-user-application-id" hidden>
                        <textarea class="form-control" cols="12" rows="12" name="comment" id="comment-modal-textarea"></textarea> {{-- atkeliauja is submittedAppTableBase viewo --}}
                        <div class="row justify-content-center pt-3">
                            <button type="submit" class="btn btn-dark btn-sm"> Išsaugoti komentarą </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
