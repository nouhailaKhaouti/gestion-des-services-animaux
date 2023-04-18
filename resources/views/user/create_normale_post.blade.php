<section style="margin-top:100px">
    <div class="container">
        <div class="row">
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
                            <label> <strong>Share your life with your pet</strong></label>
                            <input type="titre" class="form-control" id="titre" placeholder="post title" name="titre">
                            <textarea name="description" placeholder="Share what you've been up to..." class="form-control"></textarea>
                            <div class="actions">
                                <div class="btn-group">
                                    <!-- <button type="button" class="btn-link" title="" data-bs-toggle="tooltip" data-bs-original-title="Post an Video">
                            <input class="form-control" type="file"  value="video"  name="video"> 

                            </button>
-->
                                    <input type="hidden" name="tag" value="normale">
                                    <input type="hidden" name="type" value="0">
                                    <button type="button" class="btn-link" title="" data-bs-toggle="tooltip" data-bs-original-title="Post an Image">
                                        <input class="form-control" type="file" id="formFileMultiple" value="image[]" name="image[]" multiple>
                                    </button>
                                </div>
                                <button type="submit" class="btn btn-sm btn-rounded btn-info ">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>