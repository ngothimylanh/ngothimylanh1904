#include<bits/stdc++.h>
#define MAX 20
using namespace std; 
int n,k,j=0;
int Bool[MAX]={0},A[MAX]; 
void Xuat() 
{
	j++;
	cout<<j<<":   ";
    for (int i=1;i<=n;i++)  cout<<A[i] << " ";
    cout<<endl;
}
void Try(int k) 
{
    for(int i=1;i<=n;i++) 
	{
        if(!Bool[i]) 
		{
            A[k]=i; 
            Bool[i]=1;
            if(k==n)   Xuat();
            else
            Try(k+1);
            Bool[i]=0;
        }
    }
}
int main() 
{
    freopen("BT1.inp","r",stdin);
    freopen("BT1.out","w",stdout);
    cin>>n;
    Try(1);
    cout<<"so hoan vi: "<<j;
}
