import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Seguro } from '../model/Seguro';
import { environment } from 'src/environments/environment';
import { OnlineOfflineService } from './online-offline.service';
import { Observable } from 'rxjs/internal/Observable';

@Injectable({
  providedIn: 'root'
})
export class SeguroService {
  [x: string]: any;
  private API_SEGUROS = 'http://localhost:9000/';

  constructor(
    private http: HttpClient,
  ) {}

  cadastrar(seguro: Seguro){
    this.http.post(this.API_SEGUROS + 'api/seguros', seguro)
      .subscribe(
        () => alert('Seguro foi cadastrado com sucesso.'),
        (err) => console.log('erro ao cadastrar')
      )
  }

  listar(): Observable<Seguro[]> {
    return this.http.get<Seguro[]>(this.API_SEGUROS + 'api/seguros');
  }
}
