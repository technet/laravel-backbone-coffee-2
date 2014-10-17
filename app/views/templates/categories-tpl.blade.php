<script type="text/template" id="tpl-category-search">
    <form class="form-inline">
        <input type="text" class="form-control" placeholder="Category code">
        <input type="text" class="form-control" placeholder="Category name">
        <button type="submit" class="btn btn-primary btn-search">Search</button>
        <button type="cancel" class="btn btn-default btn-clear">Clear</button>
    </form>
</script>

<script type="text/template" id="tpl-category-results">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th class="id-col col-sm-1">Id</th>
            <th class="col-sm-3">Code</th>
            <th class="col-sm-5">Name</th>
            <th class="col-sm-3"><a id='btn-add' class="btn btn-success">New</a></th>
        <tr>
    <thead>
    <tbody></tbody>
</table>
</script>

<script type="text/template" id="tpl-category-row">
    <td class="id-col col-sm-1"><%= m.id %></td>
    <td class="col-sm-3"><%= m.code %></td>
    <td class="col-sm-5"><%= m.name %></td>
    <td class="col-sm-3">
        <a class="btn btn-default btn-edit">Edit</a>
        <a class="btn btn-danger btn-delete">Delete</a>
    </td>               
</script>

<script type="text/template" id="tpl-category-edit">
    <td class="id-col col-sm-1"><% _.isUndefined(m.id)? print('#'): print(m.id) %></td>
    <td class="col-sm-3"><input type="text" class="code-edit" placeholder="Categody code" value="<%= m.code %>"></td>
    <td class="col-sm-5"><input type="text" class="name-edit" placeholder="Categody name" value="<%= m.name %>"></td>
    <td class="col-sm-3">
        <a class="btn btn-primary btn-save">Save</a>
        <a class="btn btn-warning btn-cancel">Cancel</a>
    </td>       
</script>