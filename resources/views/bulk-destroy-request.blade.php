@php echo "<?php"
@endphp


namespace {{ $modelNameSpace }};

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class BulkDestroy{{ $modelBaseName }} extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * {{'@'}}return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.{{ $modelDotNotation }}.bulk-delete');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * {{'@'}}return array
     */
    public function rules(): array
    {
        return [
            'ids.*' => 'integer'
        ];
    }
}
