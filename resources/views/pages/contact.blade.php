@extends('main')

@section('title',' | Контакт')
 
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Контактирај ме </h1>
                <hr>
                <form>
                    <div class="form-group">
                        <label name="email">Емаил:  </label>
                        <input id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="subject">Наслов:  </label>
                        <input id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="message">Текст:  </label>
                        <textarea id="message" name="message" class="form-control">Внеси ја твојата порака тука...
                        </textarea>
                    </div>
                    <input type="submit" value="Прати порака" class="btn btn-success">
                </form>
            </div>
        </div>
@endsection


    