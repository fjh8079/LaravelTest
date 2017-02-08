<form id="form-login" class="p-t-15" role="form" method="POST" action="/api/v1/users">
    <input type="text" name="_token" hidden value="{!! csrf_token() !!}" />
    name
    <input name="name" value=""/>
    gender 
    <select type="text" name="gender">
    	<option value="male">男</option>
    	<option value="female">女</option>
    </select>
    <input type="submit" value="送出"/>
</form>