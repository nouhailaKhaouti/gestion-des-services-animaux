
            <div class="col-lg-6 col-lg-5 mb-4">
                <div class="panel">
                    <div class="panel-content panel-activity">
                        @if(session()->has('message'))
                        <div class="alert alert-success">

                            <button type="button" class="close" data-dismiss="alert">
                                x
                            </button>

                            {{session()->get('message')}}

                        </div>
                        @endif
                        <form action="{{url('post')}}" class="panel-activity__status" method="post" enctype="multipart/form-data">
                            @csrf
                            <label> <strong>Post for adopt or missing pets </strong></label>
                            <input type="titre" class="form-control" id="titre" placeholder="post title" name="titre">
                            <input type="descriptin" class="form-control" id="description" placeholder="animal name" name="description">
                            <select name="tag" id="tag" class="form-control" require>
                                <option value="">---tag---</option>
                                <option value="adopt">adopt</option>
                                <option value="missing">missing</option>
                            </select>
                            <select name="category" id="category" class="form-control" require>
                                <option value="">---category---</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->libelle}}</option>
                                @endforeach
                            </select>
                            <select class="form-control" name="breed" id="breed" require>
                                <option value="">---breed---</option>
                                @foreach($breeds as $breed)
                                <option value="{{$breed->id}}">{{$breed->libelle}}</option>
                                @endforeach
                            </select>
                            </select>
                            <div class="actions">
                                <div class="btn-group">
                                    <!-- <button type="button" class="btn-link" title="" data-bs-toggle="tooltip" data-bs-original-title="Post an Video">
                            <input class="form-control" type="file"  value="video"  name="video"> 

                            </button>-->
                                    <button type="button" class="btn-link" title="" data-bs-toggle="tooltip" data-bs-original-title="Post an Image">
                                        <input class="form-control" type="file" id="formFileMultiple" value="image[]" name="image[]" multiple>
                                    </button>
                                </div>
                                <input type="hidden" name="type" value="1">
                                <button type="submit" class="btn btn-sm btn-rounded btn-info ">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>