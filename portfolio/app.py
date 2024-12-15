from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/api/product', methods=['GET'])
def get_product():
    product = {
        "name": "Produto Exemplo",
        "description": "Descrição detalhada do produto.",
        "price": "R$100,00"
    }
    return jsonify(product)

if __name__ == '__main__':
    app.run(debug=True)
