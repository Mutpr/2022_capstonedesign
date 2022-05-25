//
//  SearchManager.swift
//  chajjip
//
//  Created by JunHwan Kim on 2022/05/06.
//

import Foundation
import Alamofire


class SearchManager{
    let searchRequestURL = API.search_URL
    let dummySearchResult = DummyData.shop
    
    func search(text : String, completion : @escaping ([Shop]) -> ()){
        // 현 함수에서 검색된 데이터 배열 받은 후 completion 실행
            completion(dummySearchResult)
        
//        let headers : HTTPHeaders = [
//            .contentType("application/json; charset=UTF-8"), .accept("application/json; charset=UTF-8")
//        ]
//        AF.request(, method: <#T##HTTPMethod#>, parameters: <#T##Encodable?#>, encoder: <#T##ParameterEncoder#>, headers: headers).response{ response in
//            debugPrint(response)
//            switch response.result{
//            case .success(let data):
//                do{
//                    let json = try JSONSerialization.jsonObject(with: data!, options: [])
//                    //응답에 따라 completion 결정
//
//                }catch{
//                    print(error.localizedDescription)
//                }
//            case .failure(let error):
//                print(error.localizedDescription)
//            }
//        }
        
    }
    
}
