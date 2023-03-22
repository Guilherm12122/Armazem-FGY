from dash import Dash, html, dcc, Output, Input
import plotly.express as px
import pandas as pd
import json

app = Dash(__name__)

df = pd.read_json('result.json')

fig = px.bar(df, x="nome_produto", y="qtdeKg", color="nome_do_corredor", barmode="group")

opcoes = list(df['nome_do_corredor'].unique())
opcoes.append("Todos os corredores")

app.layout = html.Div(children=[
    html.H1(children='Dash Analytics Market'),
    html.H2(children='Mercado GYF'),

    html.Div(children='''
        Esse gráfico mostra a distribuição da quantidade dos produtos do mercado pelos corredores existentes.
    '''),
    html.Div(id="texto"),
    dcc.Dropdown(opcoes, value='Todos os corredores', id='lista_corredores'),
    dcc.Graph(
        id='grafico_mercado_quantidade',
        figure=fig
    )
])

@app.callback(
    Output('grafico_mercado_quantidade', 'figure'),
    Input('lista_corredores', 'value')
)
def update_output(value):
    if value == "Todos os corredores":
       fig = px.bar(df, x="nome_produto", y="qtdeKg", color="nome_do_corredor", barmode="group")
    else:
        tabela_filter = df.loc[df['nome_do_corredor'] == value, :]
        fig = px.bar(tabela_filter, x="nome_produto", y="qtdeKg", color="nome_do_corredor", barmode="group")
    return fig

if __name__ == '__main__':
    app.run_server(debug=True)