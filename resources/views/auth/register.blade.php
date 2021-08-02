<x-layout>


    <form method="POST" action="{{route('register')}}">
    @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome e Cognome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">conferma Password</label>
                <input  type="password_confirmation" class="form-control" id="exampleInputPassword1" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-layout>
