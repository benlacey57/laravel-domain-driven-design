<tr>
    <td>{{ $option['title'] }}</td>
    <td>
        <input type="text" class="form-control md-form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               name="{{ $option['name'] }}" value="{{ $option['value'] }}" placeholder=""/>
    </td>
</tr>
