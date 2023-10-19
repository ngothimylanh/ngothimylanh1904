#include <bits/stdc++.h>
#include <conio.h>
using namespace std;
void Nhap(int &n, int &k)
{
	cin>>n>>k;
}
int C(int n, int k)
{
    int a[100][100];
    if (n==0||n==k) return 1;
	else for (int i=0;i<=n;i++)
       	{
			for (int j=i;j<=k;j++)
           	{
				if (i==0||i==j) a[i][j]=1;
            	else a[i][j]=a[i][j-1]+a[i-1][j-1];
           	}
    	}
    return a[n][k];
}
void Xuat(int n, int k)
    {
    cout<<"He so nhi thuc C("<<n<<","<<k<< ") = "<<C(n,k);
    }
main()
{
    int n,k;
    freopen("NhiThucQHD.inp","r",stdin);
    freopen("NhiThucQHD.out","w",stdout);
    Nhap(n,k);
    Xuat(n,k);
}
