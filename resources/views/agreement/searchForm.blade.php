    <div class="container-fluid">
                    <h3>Paieška</h3>
                    <hr />
                    <form action="" method="post" id="search_form">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name" >Vardas</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$name}}">
                            </div>
                            <div class="col-md-3">
                                <label for="surname">Pavardė</label>
                                <input class="form-control" type="text" id="surname" name="surname" value="{{$surname}}">
                            </div>
                            <div class="col-md-3">
                                <label for="pers_code" >Asmens kodas</label>
                                <input class="form-control" type="text" id="persCode" name="persCode" value="{{$persCode}}">
                            </div>
                            <div class="col-md-3">
                                <label for="type">Sutarties tipas </label>

                                <select class="form-control" name="type" id="type" onchange="searchForm();">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" @if ($type->id == $selectedType) selected @endif>{{$type->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="program">Programa</label>
                                <select class="form-control" name="program" id="program" onchange="searchForm();">
                                    @foreach ($programs as $program)
                                        @if ($program->lama_kodas)
                                            <option value="{{$program->lama_kodas}}" @if ($program->lama_kodas === $selectedProgram) selected @endif>
                                                @if ($program->luadmProgrammaPkods !== null)
                                                    {{$program->luadmProgrammaPkods->pnosauk}}
                                                @endif
                                            </option>
                                        @else
                                            <option value="{{$program->vdu_pkods}}"  @if ($program->vdu_pkods === $selectedProgram) selected @endif>
                                                @if ($program->luadmProgrammaPkods !== null)
                                                    {{$program->luadmProgrammaPkods->pnosauk}}
                                                @endif
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="stage">Etapai</label>
                                <select class="form-control" name="stage" id="stage" onchange="searchForm();">
                                    <option value="">Visi</option>
                                    @foreach($stages as $stage)
                                        <option value="{{$stage->etapas}}" @if ($stage->etapas === $selectedStage) selected @endif>{{$stage->etapas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="year">Metai</label>
                                <select class="form-control" name="year" id="year" onchange="searchForm();">
                                    @for($i = date('Y'); $i >= 2016; $i--)
                                        <option value="{{$i}}" @if ($i == $selectedYear) selected @endif>{{$i}}</option>
                                    @endfor
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <br />
                                <input type="submit" value="Ieškoti" class="btn btn-dark" id="submit_search" onclick="searchResults();">
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
        </div>


