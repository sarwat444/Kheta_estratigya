<div class="btn-group">
    <a href="javascript:void(0);" data-section-id="{{$section->id}}" class="text-muted font-size-20 edit"><i
            class="bx bxs-edit"></i></a>
    <form action="{{ route('dashboard.sections.destroy', $section->id) }}" method="POST">@csrf @method('delete')
        <a class="text-muted font-size-20 confirm-delete"><i class="bx bx-trash"></i></a>
    </form>
</div>
