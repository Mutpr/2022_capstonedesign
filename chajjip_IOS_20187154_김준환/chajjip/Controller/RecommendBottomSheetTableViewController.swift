//
//  RecommendBottomSheetTableViewController.swift
//  chajjip
//
//  Created by JunHwan Kim on 2022/04/10.
//

import UIKit

protocol RecommendListDelegate{
    func pressRecommendList(vm : ShopInfoViewModel)
    func closeTableView()
    func showTableView()
}

class RecommendBottomSheetTableViewController: UITableViewController {
    var recommendShopListVM : RecommendViewModel!
    var delegate : RecommendListDelegate?
    func getShopList(model : RecommendViewModel){
        self.recommendShopListVM = model
        tableView.register(UINib(nibName: "RecommendListTableViewCell", bundle: nil), forCellReuseIdentifier: "recommendCell")
    }

    override func viewDidLoad() {
        super.viewDidLoad()
        print("Show Recommend table")
    }
    
    override func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return recommendShopListVM.numOfShopList()
    }
    
    override func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        let recommendShop = recommendShopListVM.shopAtIndex(indexPath.row)
        let cell = tableView.dequeueReusableCell(withIdentifier: "recommendCell", for: indexPath) as! RecommendListTableViewCell
        cell.shopNameLabel.text = recommendShop.name
        cell.addressLabel.text = recommendShop.address
        cell.shopImageView.image = recommendShop.shopImage
        cell.shop = recommendShop.shop
        cell.delegate = self
        return cell
    }
    
    override func tableView(_ tableView: UITableView, heightForRowAt indexPath: IndexPath) -> CGFloat {
        return 100.0
    }
    
    override func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
        delegate?.pressRecommendList(vm: recommendShopListVM.shopAtIndex(indexPath.row))
    }
    
    override func viewWillAppear(_ animated: Bool) {
        delegate?.showTableView()
    }
    
    override func viewWillDisappear(_ animated: Bool) {
        print("Close TableView")
        delegate?.closeTableView()
    }
    
}

extension RecommendBottomSheetTableViewController : RecommendTableViewDelegate{
    func showMoreInfoView(shop: Shop) {
        let vc = self.storyboard?.instantiateViewController(withIdentifier: "MoreInfoViewController") as! MoreInfoViewController
        vc.shop = shop
        present(vc, animated: true, completion: nil)
    }
}
