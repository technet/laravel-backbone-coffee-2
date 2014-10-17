class CategoryCollection extends app.BaseCollection
    url:'/api/categories'
    model: app.Category

@app = window.app ? {}
@app.CategoryCollection = CategoryCollection