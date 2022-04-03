import { Component, OnInit } from '@angular/core';
import { MarcaCarro } from 'src/app/services/model/MarcaCarro';
import { Seguro } from 'src/app/services/model/Seguro';
import { CarroService } from 'src/app/services/services/carro.service';
import { SeguroService } from 'src/app/services/services/seguro.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-cadastro-seguros',
  templateUrl: './cadastro-seguros.component.html',
  styleUrls: ['./cadastro-seguros.component.css']
})
export class CadastroSegurosComponent implements OnInit {

  public marcasCarro$: Observable<MarcaCarro[]> | undefined;
  public seguro = new Seguro();

  constructor(
    private carroService: CarroService,
    private seguroService: SeguroService,
  ) { }

  ngOnInit() {
    this.carregarMarcasDeCarro();
  }

  cadastrar() {
    this.seguroService.cadastrar(this.seguro);
  }

  carregarMarcasDeCarro() {
    this.marcasCarro$ = this.carroService.getMarcas();
  }


}

